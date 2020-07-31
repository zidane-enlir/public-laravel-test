<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;
use App\Http\Requests\TweetRequest;
use App\Models\HashTag;


class TweetController extends Controller
{
    public $tweet;

    public function __construct()
    {
        $this->tweet = new Tweet;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tweet.index')
                    ->with('tweets', $this->tweet->getWithNewTweets());
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweet.create');
    }

    /**
     * @param \App\Http\Requests\TweetRequest
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        $this->tweet->customStore($request);

        return redirect('tweets');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tweet.show')
            ->with('tweet', $this->tweet->findIdenticalTweet($id));
    }

    /**
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tweet.edit')
            ->with('tweet', $this->tweet->findIdenticalTweet($id));
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\TweetRequest
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, TweetRequest $request)
    {
        $this->tweet->findIdenticalTweet($id)->customUpdate($id, $request);

        return redirect('tweets');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->tweet->findIdenticalTweet($id)->delete();

        return redirect('tweets');
    }

    /**
     * @param int $hash_tag_id
     * @return \Illuminate\Http\Response
     */
    public function showByHashtag(int $hash_tag_id)
    {
        $hash_tag = HashTag::find($hash_tag_id);

        return view('tweet.index')
                ->with('tweets', $hash_tag->tweets);
    }
}
