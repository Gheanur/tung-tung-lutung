
<div class="d-flex flex-column p-3 bg-light text-black" style="height: 100vh;">
    <h4 class="mb-4">InstaClone</h4>

    <a href="{{ route('home') }}" class="btn btn-success text-black text-decoration-none mb-3 {{ request()->routeIs('home') ? 'fw-bold' : '' }}">
        Home
    </a>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
        Create New Post
      </button>

    <a href="{{ route('profile') }}" class="btn btn-success text-black text-decoration-none mb-3 {{ request()->routeIs('profile') ? 'fw-bold' : '' }}">
        Profile
    </a>
</div>


