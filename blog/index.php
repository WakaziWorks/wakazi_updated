<?php
include("../screens/headers/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .fixed-image {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Wakazi Blogs</h1>
    <!-- Navigation Links -->
    <nav class="mb-5">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" style="color: #c837d1;" href="#">All Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #c837d1;" href="#">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #c837d1;" href="#">Gallery</a>
        </li>
      </ul>
    </nav>
    <!-- Blog Cards -->
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://imgs.search.brave.com/o2jupxZQngmTPuruU6MC91BmB2GcXNmQLRH0tbsldO8/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/c2l0cmFrYXJhdHNp/bWJhLmNvbS93cC1j/b250ZW50L3VwbG9h/ZHMvMjAyMC8wOS81/NGI4MmQwODZiYjNm/NzY4MjZiZDQwZWQu/anBn" class="card-img-top fixed-image" alt="...">
          <div class="card-body">
            <h5 class="card-title">48 Laws of Power</h5>
            <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam.
            </p>
            <a href="#" class="btn" style="background: #c837d1;" data-toggle="modal" data-target="#blogModal">Continue Reading</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://imgs.search.brave.com/y732FBICALwzViAHWy4-YtMzZ1RxjajI13lw2KL2Yik/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5saWNkbi5jb20v/ZG1zL2ltYWdlL0M0/RTEyQVFFcEJ6OWJ2/UnE3WFEvYXJ0aWNs/ZS1jb3Zlcl9pbWFn/ZS1zaHJpbmtfNjAw/XzIwMDAvMC8xNTc2/NzY3NzkyNDE5P2U9/MjE0NzQ4MzY0NyZ2/PWJldGEmdD1Wcnp2/RmZqb0puTkFaZXp3/ZzV3a2tXMkUxeGpF/VEVNdkV1VUlaMjB2/NWow" class="card-img-top fixed-image" alt="...">
          <div class="card-body">
            <h5 class="card-title">Laws of Human Nature</h5>
            <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam.
            </p>
            <a href="#" class="btn" style="background: #c837d1;" data-toggle="modal" data-target="#blogModal">Continue Reading</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://imgs.search.brave.com/unrcgYOqL0ytH1eGD8x_wGsaC8nEbmCqT8gZhqwLDKk/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMtbmEuc3NsLWlt/YWdlcy1hbWF6b24u/Y29tL2ltYWdlcy9J/LzgxVkRKK1d0Uk9M/LmpwZw" class="card-img-top fixed-image" alt="...">
          <div class="card-body">
            <h5 class="card-title">The 5am Club</h5>
            <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam.
            </p>
            <a href="#" class="btn" style="background: #c837d1;" data-toggle="modal" data-target="#blogModal">Continue Reading</a>
          </div>
        </div>
      </div>
      <!-- More blog cards go here -->
    </div>
  </div>

  <!-- Blog Modal -->
  <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blogModalLabel">48 Laws of Power</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Blog content goes here -->
          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna
          aliqua. Feugiat sed lectus vestibulum mattis ullamcorper velit
          sed. Neque aliquam vestibulum morbi blandit cursus risus at ultrices.
          Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus.
          Sodales neque sodales ut etiam sit amet nisl. Viverra accumsan in nisl nisi
          scelerisque eu. Ut pharetra sit amet aliquam id. Imperdiet sed euismod nisi porta lorem mollis. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Senectus et netus et malesuada fames ac turpis egestas. Eget lorem dolor sed viverra ipsum. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc
          </p>
          <img src="https://imgs.search.brave.com/o2jupxZQngmTPuruU6MC91BmB2GcXNmQLRH0tbsldO8/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/c2l0cmFrYXJhdHNp/bWJhLmNvbS93cC1j/b250ZW50L3VwbG9h/ZHMvMjAyMC8wOS81/NGI4MmQwODZiYjNm/NzY4MjZiZDQwZWQu/anBn" class="img-fluid" alt="Sample Image">
          <p>Phasellus ut consequat magna, ac aliquet ex. Curabitur elementum nunc eu nulla pharetra, eu auctor ex suscipit. Fusce sit amet ultricies est. Nullam dictum est eget justo rutrum, at venenatis leo vestibulum. Duis mollis vehicula ultrices. Curabitur pharetra risus eget quam varius, nec tempor mi suscipit. Pellentesque volutpat est nec quam blandit, non ultrices sem tempor. Proin maximus volutpat magna, a egestas elit fermentum vitae. Curabitur varius ut eros ac pellentesque. Nunc id lorem mi.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background: #c837d1;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    include("../screens/footer/footer.php");
?>
