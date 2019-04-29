<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h2 class="page-header">Recent Comments</h2>
        <section class="comment-list">
            <!-- First Comment -->
            @foreach($comments as $comment)
            <article class="row ">
                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="/images/america.jpg" />

                    </figure>
                </div>
                <div class="col-md-9 col-sm-9 col-lg-9">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <figcaption class="text-left">
                                    <a href="users/{{$comment->user->id}}">
                                        {{$comment->user->first_name}}
                                        {{$comment->user->last_name}}<br />
                                        {{$comment->user->email}}
                                    </a>
                                </figcaption>

                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>Commented on:  {{$comment->created_at}}</time>
                            </header>
                            <div class="comment-post">
                                <p>
                                    {{$comment->body}}
                                </p>
                            </div>
                            <label for="proof">Proof:</label>
                            <div class="comment-post">
                                <p>
                                    {{$comment->url}}
                                </p>
                            </div>
                            <p><a class="btn btn-primary" href="/projects/{{$comment->commentable_id}}" role="button">View Project »</a></p>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </section>
    </div>
</div>