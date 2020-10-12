
@extends('pageLayouts.adminlayout')


@section('content')
        
        <div class="row">
          <div class="col-sm-12">
            <h3>Frequently asked Questions</h3>
            
            <h4 style="background-color:aquamarine">Not answered</h4>
            @if (count($helpDataN)>0)
                
            
            @foreach ($helpDataN as $helpDataN)


            <script>
            $(document).ready(function(){
                  $("#form{{$helpDataN->id}}").hide();
                  $("#t").hide();
                  $("#titleH{{$helpDataN->id}}").hide();

                  $("#title{{$helpDataN->id}}").click(function(){
                    $("#form{{$helpDataN->id}}").show();
                    $("#title{{$helpDataN->id}}").hide();
                    $("#titleH{{$helpDataN->id}}").show();
                  
                  });

                  $("#titleH{{$helpDataN->id}}").click(function(){
                    $("#form{{$helpDataN->id}}").hide();
                    $("#title{{$helpDataN->id}}").show();
                    $("#titleH{{$helpDataN->id}}").hide();
                  });

                });
                
            </script>

              <div id="title{{$helpDataN->id}}">
                <h4><a href="#">{{$helpDataN->question}}</a></h4>
              </div>
              <div id="titleH{{$helpDataN->id}}">
                  <h4><a href="#">{{$helpDataN->question}}</a></h4>
                </div>

               <div id="form{{$helpDataN->id}}">

                  <form action="/admin/faq/view/post/{{$helpDataN->id}}" method="post">
                    {{ csrf_field() }}
                      Question <br>
                      <textarea name="question" id="" cols="100%" rows="3" value="" class="form-control">{{$helpDataN->question}}</textarea>
                      Your Answer<br>
                      <textarea name="answer" id="" cols="100%" rows="3" class="form-control">{{$helpDataN->answer}}</textarea>
                      <input type="hidden" name="approved" id="" value="Y"><br>
                      <input type="submit" value="Post" name="save" class="btn btn-primary">
                      <a href="/admin/faq/remove/{{$helpDataN->id}}" class="btn btn-danger">Remove</a>
    
                   </form>
               </div>
              
            @endforeach

            @else
               Not Found 
            @endif
            @include('inc.messages')
            <h4 style="background-color:aquamarine">Answered</h4>
            @if (count($helpData)>0)
               @foreach ($helpData as $helpData)
                   <h4>{{$helpData->question}}</h4>
                   <span>{{$helpData->answer}}</span><br>
                   <span><a href="/admin/faq/remove/{{$helpData->id}}" style="color:red;">Remove</a></span>
               @endforeach
               @else
                Not found
               @endif

               <h4>Create New Post</h4>
               <div id="form2">
                  <form action="/admin/faq/view/post/" method="post">
                    {{ csrf_field() }}
                      Question <br>
                      <textarea name="question" id="" cols="100%" rows="3" value="" class="form-control"></textarea>
                      Your Answer<br>
                      <textarea name="answer" id="" cols="100%" rows="3" class="form-control"></textarea>
                      <input type="hidden" name="approved" id="" value="Y"><br>
                      <input type="submit" value="Post" name="save" class="btn btn-primary">
    
                   </form>
               </div>
               <br>
               <h4>Feedbacks on site</h4>
               <div class="well">
                @foreach ($feedbackData as $feedbackData)
                <strong>{{$feedbackData->email}}</strong>
                <p>{{$feedbackData->question}}</p>
                
            @endforeach
               </div>

          </div>
        </div>
@endsection