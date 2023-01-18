@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')
    @include('inc.teamHeader')
    <section class="contact-box">
        <div class="contact">
            <a class="box email" href="africaphageforum@gmail.com" target="_blank">
                <i class="fa fa-envelope"></i>
                <span>Email Us</span>
            </a>
            <a class="box twitter" href="https://twitter.com/PhageForum" target="_blank">
                <i class="fab fa-twitter"></i>
                <span>Follow us</span>
            </a>
        </div>
        <div class="contact-form">
            
            <form action="https://formsubmit.co/e03a809c896a1b751931c3fe9ad6f045" method="post" enctype="multipart/form-data">
                @csrf
                
                <h3>Contact us</h3>
                
                <div class="box">
                    <label htmlfor="name">Username</label>
                    <input id="name" type="name" name="name"  placeholder="Enter your name"  required />
                </div>
                <div class="box">
                    <input type="hidden" name="_next" value="https://africaphageforum.org/thanks">
                    <input type="hidden" name="_captcha" value="false">
                </div>
                <div class="box">
                    <label htmlfor="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Enter your email"  required />
                </div>

                <div class="box">
                    <input type="hidden" name="_subject" value="NEW CONTACT FROM AFRICA PHAGE FORUM">
                    <input type="hidden" name="_captcha" value="true">
                </div>


                <label htmlfor="message">Message</label>
                <textarea id="message" class="message" name="message"  rows="5" 
                    minlength="50" maxlength="300" placeholder="Message"  required></textarea>
                
                
                <div class="createBtn">
                    <button type="submit">Send</button>
                </div>
            </form>
        </div>
    </section>
@endsection