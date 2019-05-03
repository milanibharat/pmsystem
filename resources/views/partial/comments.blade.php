<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h2 class="page-header"><i class="fa fa-commenting" aria-hidden="true"></i> Recent Comments</h2>
        <section class="comment-list">
            <!-- First Comment -->
            @foreach($comments as $comment)
            <article class="row ">
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="/images/america.jpg" ><br />
                        <figcaption class="text-left" >
                            <a href="users/{{$comment->user->id}}">
                                {{$comment->user->first_name}}
                                {{$comment->user->last_name}}<br />
                                <i class="fa fa-envelope" aria-hidden="true">{{$comment->user->email}}</i> 
                            </a>
                        </figcaption>

                    </figure>
                </div>

                <div class="col-md-5 col-sm-5 col-lg-7 col-xs-5">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-calendar-times-o " aria-hidden="true"></i>
                                    Commented on:  {{$comment->created_at}}</time>
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