<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    @auth 

<h1>Congrates you are logged in </h1>

<form action="/logout" method="POST">

@csrf
<button>Log Out </button>

</form>

<div style="border: 3px solid black;">
    <h2>Create a New Post</h2>
    <form action="/create_post" method="POST">
@csrf
<input name="title" type="text" placeholder="Post Title">
<textarea name="body" placeholder="Body Content"></textarea>
<button>Save</button>
    </form>
</div>


<div style="background-color:beige; padding:10px;margin:10px">
    <h1>All Posts </h1>
 @foreach ($posts as $post)
<div style="background-color: rgb(162, 157, 157);border: 3px solid white; padding:10px;margin:10px">
<h3 >{{$post->title}} by {{$post->user->name}}</h3>
<h3>{{$post->body}}</h3>
<p><a href="/edit-post/{{$post->id}}">Edit</a></p>
<form action="/delete-post/{{$post->id}}" method="POST">
    @csrf
    
    @method('DELETE')
    <button>Delete</button>
    
    </form>
</div>
 @endforeach

</div>


    @else 
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <button>Submit</button>
            </form>
        </div>
        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="post">
                @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="Password">
            <button>Log in </button>
                </form>
            </div>
    @endauth
 

</body>
</html>