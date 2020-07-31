<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HashTag;

class Tweet extends Model
{
    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hashTags()
    {
        return $this->belongsToMany('App\Models\hashTag');
    }

    /**
     * @param App\Http\Requests\TweetRequest
     * @return Boolean
     */
    public function customStore ($request) {
        $tweet = new Tweet;
        $tweet->body = $request->input('body');
        $tweet->user_id = $request->user()->id;
        $tweet->save();

        /**
         * [1/2] 関連先レコード処理
         *       * HashTagの新規保存
         */
        $hash_tag_ids = $this->saveHashTag($request);

        /**
         * [2/2] 中間レコード処理
         *       * 中間テーブルの新規保存
         */
        $tweet->hashTags()->sync($hash_tag_ids);

        $request->session()->flash('flash_message', 'Tweetが投稿されました。');

        return true;
    }

    /**
     * @param App\Http\Requests\TweetRequest
     * @return Boolean
     */
    public function customUpdate ($id, $request) {
        $tweet = Tweet::find($id);
        $tweet->body = $request->input('body');
        $tweet->save();

        $hash_tag_ids = $this->saveHashTag($request);

        $tweet->hashTags()->sync($hash_tag_ids);

        $request->session()->flash('flash_message', 'Tweetが更新されました。');

        return true;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getWithNewTweets()
    {
        return Tweet::orderBy('created_at', 'desc')->get();
    }

    /**
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function findIdenticalTweet($id)
    {
        return Tweet::find($id);
    }

    /**
     * @param $request
     * @return Array $hash_tag_ids
     */
    public function saveHashTag($request)
    {
        /**
         *   ex: preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
         *     == ['tag1', 'tag2, 'tag3', 'tag4'];
         */
        $hash_tag_names = preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY);
        $hash_tag_ids = [];
        foreach ($hash_tag_names as $hash_tag_name) {
            // 既存のレコードがあれば、何もしない。
            //              無ければ、新規保存。
            $hash_tag = HashTag::firstOrCreate([
                'name' => $hash_tag_name,
            ]);
            $hash_tag_ids[] = $hash_tag->id;
        }
        return $hash_tag_ids;
    }
}
