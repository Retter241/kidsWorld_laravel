

<h3>Оставить комментарий:</h3>
                  {!! Form::open(array('action'=>'Site\SiteController@addComment'.$type, 'method' => 'POST')) !!}
                        <input type="text" name="Name" disabled placeholder="Имя" value="{{\Auth::user()->name}}">
               
{!! Form::textarea('comment_body', '', ['class' => 'form-control' , 'name' => 'comment_body' , 'placeholder' => 'Введите текст...']) !!}
                           {!! Form::text('post_id', $post_id, ['class' => 'form-control' , 'placeholder' => 'post_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
    {!! Form::text('type', $type, ['class' => 'form-control' , 'placeholder' => 'type' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
                        <div class="w3_single_submit">
                            {!! Form::submit('Отправить') !!}
                        </div>
             {!! Form::close() !!}