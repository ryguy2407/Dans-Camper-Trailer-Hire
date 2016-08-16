@extends('emails.layouts.responsive_email_layout')
@section('content')
    <table border="0" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <td class="templateColumnContainer" style="text-align: center;">
                <img src="{{ url('/images/logo.png') }}" width="50%" style="max-width:100%;" class="columnImage" />
            </td>
        </tr>
        <tr>
            <td valign="top" class="templateColumnContainer">
                <h1 style="text-align: center;font-family: Arial;">{{ $name }} has made an enquiry on the website</h1>
                </div>
                <p style="font-family: Arial;">Name: {{ $name }}</p>
                <p style="font-family: Arial;">Email: {{ $email }}</p>
                <p style="font-family: Arial;">Phone: {{ $phone }}</p>
                <p style="font-family: Arial;">Message: {{ $enquiry }}</p>
            </td>
        </tr>
    </table>
@stop