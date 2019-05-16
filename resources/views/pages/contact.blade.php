@extends('main')

@section('title', '| Contact')

@section('content')

       <div class="row">
           <div class="col-md-12">
               <h1>Contact Me</h1>
                
               <hr>

               <form method="POST" action="{{ url('contact') }}">
                @csrf
                   <div class="form-group">
                       <label name="email">Email:</label>
                       <input type="" id="email" name="email" class="form-control">
                   </div>

                   <div class="form-group">
                       <label name="subject">Subject:</label>
                       <input type="" id="subject" name="subject" class="form-control">
                   </div>

                    <div class="form-group">
                       <label name="message">Message:</label>
                       <textarea type="" id="message" name="message" class="form-control"></textarea>
                   </div>

                   <input type="submit" value="Send Message" class="btn btn-success">
               </form>

           </div>
       </div>
 
@stop