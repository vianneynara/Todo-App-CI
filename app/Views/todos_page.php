<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
  <title>Home | Todo App</title>
</head>

<body>
  <!-- display scren width and height -->
  <div id="dimensions" class="fixed right-0 bg-green-200"></div>
  <div class="bg-gray-100 mx-auto w-[500px] p-2 h-screen flex flex-col">
    <header class="bg-gray-200 mb-2 p-2 rounded">
      <nav class="flex justify-between items-center">
        <a href="/" class="btn flex">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
          </svg>
          <span style="font-weight:bold; margin-right:3px;">Log out</span>
        </a>
        <a href="/todos-page">
          <h1 class="font-extrabold">Todo App</h1>
        </a>
        <button class="btn" onclick="openCreateTodoDialog()"><span style="font-weight:bold">New Todo</span></button>
      </nav>
    </header>
    <main class="bg-gray-200 flex-grow mb-10 p-2 rounded">
      <span class="font-bold">List of Todos</span>
      <!-- create a line  -->
      <hr style="height:2px; color:black; background-color:black;">
      <?php if (empty($todos)) : ?>
        <div class="text-center">
          No todos found.
        </div>
      <?php else : ?>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Actions</th>
            </tr>
          </thead>
          <hr>
          <tbody>
            <?php foreach ($todos as $index => $todo) : ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $todo['title'] ?></td>
                <td>
                  <a href="#">Edit</a>
                  <a href="#">Done</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </main>
    <footer class="bg-gray-200 mt-[-2rem] rounded text-center">
      <p>2024 Nara@CodeIgniter4</p>
    </footer>
  </div>

  <dialog id="new-todo-dialog" class="bg-white p-2 rounded-lg fixed inset-0 z-10 w-[450px]">
    <div class="text-center mb-2">
      Create a new todo
    </div>
    <form action="/todos" method="POST">
      <input type="text" name="title" placeholder="Enter todo title" class="w-full p-2 mb-2 rounded border-solid border-2 border-black">
      <div class="flex justify-between gap-1">
        <button type="button" class="btn-close w-16" onclick="document.getElementById('new-todo-dialog').close()">Close</button>
        <button type="submit" class="btn-submit flex-grow">Create</button>
      </div>
    </form>
  </dialog>
</body>

<script>
  window.onresize = displayWindowSize;
  window.onload = displayWindowSize;

  // listener to close dialog when clicked outside the dialog bounds
  document.getElementById('new-todo-dialog').addEventListener('click', function(e) {
    if (e.target.tagName !== 'DIALOG')
      return;

    const rect = e.target.getBoundingClientRect();
    const clickedInDialog = (
      rect.top <= e.clientY &&
      e.clientY <= rect.top + rect.height &&
      rect.left <= e.clientX &&
      e.clientX <= rect.left + rect.width
    );

    if (clickedInDialog === false)
      e.target.close();
  });

  function displayWindowSize() {
    document.getElementById("dimensions").innerHTML = `<span style="font-weight:bold">${window.innerWidth}</span>x<span style="font-weight:bold">${window.innerHeight}</span>`;
  };

  function openCreateTodoDialog() {
    document.getElementById('new-todo-dialog').showModal();
  }
</script>

</html>