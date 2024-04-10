<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Simple Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a>
            </li>
        </ul>

            <ul class="navbar-nav mx-auto">
                 <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
                </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
    </li>
  </ul>
</div>

  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Simple Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> View Profile</a>
                    <a class="dropdown-item" href="signin.html"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                    <a class="dropdown-item" href="signup.html"><i class="fas fa-user-plus"></i> Sign Up</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
            </li>
        </ul>
    </div>
  </div>
</nav>


<div class="container mt-4">
  <div class="row">
    <div class="col-md-2 line">
      <!-- Sidebar will go here -->
      <h4>Categories</h4>
      <ul class="list-group">
        <li class="list-group-item">Category 1</li>
        <li class="list-group-item">Category 2</li>
        <li class="list-group-item">Category 3</li>
        <!-- Add more categories here -->
      </ul>
    </div>

    <div class="col-md-7">
      <!-- Main content area will go here -->
      <h2>Welcome to Simple Blog</h2>
      <p>This is a simple blog platform built with Bootstrap and PHP.</p>

       <!-- Form for creating a new post -->
    <!-- Form for creating a new post -->
<form action="submit_post.php" method="post" enctype="multipart/form-data">
     <!-- Add a hidden input field to store the username -->
     <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
<!-- <div class="form-group">

  <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="postVisibilityDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span id="postVisibilitySelected">Public</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="postVisibilityDropdown">
      <a class="dropdown-item" href="#" data-value="public">Public</a>
      <a class="dropdown-item" href="#" data-value="private">Private</a>
    </div>
  </div>
  <input type="hidden" name="postVisibility" id="postVisibilityInput" value="public">
</div> -->

   <div class="form-group">
        <div class="input-group">
            <select class="custom-select" name="postVisibility" id="postVisibilityDropdown">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
            <!-- <div class="input-group-append">
                <label class="input-group-text" for="postVisibilityDropdown">
                    <i class="fas fa-chevron-down"></i>
                </label>
            </div> -->

        </div>
    </div>


    <div class="form-group mt-2">
        <textarea class="form-control" id="postText" name="postText" rows="3" placeholder="What's on your Mind?" required></textarea>
    </div>
    
    <div class="d-flex">
    <div class="form-group mt-3">
        <input type="file" id="fileInput" class="d-none" name="postImage" accept="image/*, video/*">
        <label for="fileInput" class="btn btn-light">
            <i class="fas fa-camera"></i> Photo/Video
        </label>

        <label for="fileInput" class="btn btn-light">
            <i class="fas fa-video"></i> Live/Video
        </label>

    </div>

    <div class="form-group mt-3 mb-2">
        <input type="file" id="emojiInput" class="d-none" name="emojiImage" accept="image/*">
        <label for="emojiInput" class="btn btn-light">
            😊 Smiling Emoji
        </label>
    </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <div id="postsContainer" class="postsContainer background-white"></div>
    </div>

    <div class="col-md-3 line">
      <!-- Sidebar will go here -->
      <h4>Categories</h4>
      <ul class="list-group">
        <li class="list-group-item">Category 1</li>
        <li class="list-group-item">Category 2</li>
        <li class="list-group-item">Category 3</li>
        <!-- Add more categories here -->
      </ul>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    &copy; 2024 Simple Blog
  </div>
</footer>

<script src="js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to Fetch and Display Posts -->
<!-- JavaScript to Fetch and Display Posts -->
<script>
    // Fetch posts data from get_posts.php
    fetch('get_posts.php')
        .then(response => response.json())
        .then(posts => {
            // Generate HTML for each post and append to postsContainer
            const postsContainer = document.getElementById('postsContainer');
            posts.forEach(post => {
                // Check if post has a valid image path
                const hasPostImage = post.post_image && post.post_image.trim() !== 'uploads/';
                const hasEmojiImage = post.emoji_image && post.emoji_image.trim() !== 'uploads/';

                // Check if post is public or private
                const isPublicPost = post.visibility === 'public';

                // Generate HTML for post image if available
                const postImageHTML = hasPostImage ? `<img src="${post.post_image}" alt="Post Image">` : '';

                // Generate HTML for emoji image if available
                const emojiImageHTML = hasEmojiImage ? `<img src="${post.emoji_image}" alt="Emoji Image">` : '';

                // Generate HTML for the entire post
                const postHTML = `
                    <div class="post background-white mt-3">
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <h2>${post.username} <br></h2>
                                <span>${post.created_at}</span>
                            </div>
                            <div><p>Visibility: ${isPublicPost ? 'Public' : 'Private'}</p></div>
                        </div>
                        <p>${post.post_text}</p>
                        ${hasPostImage ? postImageHTML : ''}
                        ${hasEmojiImage ? emojiImageHTML : ''}
                    </div>
                `;
                postsContainer.innerHTML += postHTML;
            });
        })
        .catch(error => console.error('Error fetching posts:', error));
</script>





</body>
</html>
