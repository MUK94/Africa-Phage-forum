<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon", href="/public/img/apf-logo.jpeg", type="image/png">
    <link rel="stylesheet", href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/topbar.css">
    <link rel="stylesheet" href="/public/css/coverHeader.css">
    <link rel="stylesheet" href="/public/css/teamHeader.css">
    <link rel="stylesheet" href="/public/css/return.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <link rel="stylesheet" href="/public/css/about.css">
    <link rel="stylesheet" href="/public/css/team.css">
    <link rel="stylesheet" href="/public/css/teamAdmin.css">
    <link rel="stylesheet" href="/public/css/profile.css">
    <link rel="stylesheet" href="/public/css/blog.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/blogShow.css">
    <link rel="stylesheet" href="/public/css/contact.css">
    <link rel="stylesheet" href="/public/css/thanks.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/errors.css ">
    <link rel="stylesheet" href="/public/css/pagination.css">

    <title>@yield('title', 'Africa Phage Forum')</title>
</head>
<body>
    
    @include('inc.topbar')

    <div class="body-content">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('inc.footer')
    
    <script src="/public/js/toggle.js"></script>
	<script>
	    document.querySelectorAll( 'oembed[url]' ).forEach( element => {
	        // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
	        // to discover the media.
	        const anchor = document.createElement( 'a' );
	
	        anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
	        anchor.className = 'embedly-card';
	
	        element.appendChild( anchor );
	    } );
	</script>

</body>
</html>
