@extends('layouts.page')

@section('content')

    <div class="modalContainer"></div>

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Admin area</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns twelve" style="position: relative;">
                <h1>Hi {{ $user->name }}</h1>
                <a href="{{ route('bookings.create') }}" style="position:absolute;top: 10px;right: 0;font-size: 120%;width: 300px;" class="button button-primary ajax">CREATE A BOOKING</a>
            </div>
        </div>

        <div class="row">
            <div class="columns twelve">
                @if($user->isAdmin())
                    <h4 class="open-sans" style="margin-top: 20px;">Search Bookings</h4>
                    <input type="text" id="search-input" placeholder="Start typing..."/>
                    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
                    <script src="/js/algolia.js"></script>

                    <ul class="adminNav"></ul>
                @endif
            </div>

            @if($user->isAdmin())

                <div class="tabbed-content">

                    <div class="columns twelve active" data-ajax="/notifications">
                        <h4 class="open-sans">Notifications</h4>
                    </div>

                    <div class="columns twelve" data-ajax="/calendar/show">
                        <h4 class="open-sans">Booking Calendar</h4>

                    </div>

                    <div class="columns twelve" data-ajax="/bookings">
                        <h4 class="open-sans">Pending Booking Requests</h4>
                    </div>

                    <div class="columns twelve" data-ajax="/bookings/trashed/all">
                        <h4 class="open-sans">Archived Bookings</h4>
                    </div>

                    <div class="columns twelve" data-ajax="/holidays">
                        <h4 class="open-sans">School Holidays</h4>
                    </div>

                </div>

            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
           $('div.tabbed-content > div.columns').each(function(){
               var text = $(this).find('h4').text();
               $('ul.adminNav').append('<li><a href="#">'+text+'</li>');
           });
           $('body').on('click', 'ul.adminNav li', function(e){
               e.preventDefault();
               var i = $(this).index();
               $(this).children('a')
                       .addClass('active')
                       .parents('li')
                       .siblings()
                       .find('a')
                       .removeClass('active');

               $('div.tabbed-content > div.columns')
                       .eq(i)
                       .addClass('active')
                       .siblings()
                       .removeClass('active');
               $.ajax({
                   url: $('div.tabbed-content > div.columns').eq(i).data('ajax')
               }).done(function(html){
                   $('div.tabbed-content > div.columns').eq(i).html(html)
               });
           });

            $('body').on('submit', 'form.ajax', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                }).done(function(res){
                    $('div.modalContainer div.close').trigger('click');
                    $('div.columns.active').load($('div.columns.active').data('ajax'));
                }).fail(function(res){
                   if(res.status == 422) {
                       $('input').removeClass('error');
                       $('small.errormsg').remove();
                       $.each(res.responseJSON, function(key, value){
                          $('div.modalContainer')
                                  .find('input#'+key)
                                  .addClass('error')
                                  .after("<small class='errormsg'>"+value+"</small>");
                       });
                   }
                });
            });

            $('body').on('click', 'a.calendarAjax', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    type: 'GET'
                }).done(function(res){
                    $('div.columns.active').html(res);
                });
            });

            $('body').on('click', '.modal', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href')
                }).done(function(html){
                    $('div.modalContainer').show().html(html);
                    $('div.overlay').remove();
                    $('body').append('<div class="overlay"></div>');
                    $('.datepicker').pikaday();
                });
            });

            $('body').on('click', '.close, .overlay', function(e){
               $('div.modalContainer').html('').hide();
               $('div.overlay').remove();
            });

            $('ul.adminNav li:first').trigger('click');
        });
    </script>
@stop