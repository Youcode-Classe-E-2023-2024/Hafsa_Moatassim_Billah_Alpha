<?php 

$api_url = "https://jsonplaceholder.typicode.com/users";
$users_json = file_get_contents($api_url);
$users = json_decode($users_json, true);

foreach ($users as $user) {
echo '<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-gray-200 border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Username
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Email
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              '.$user['username'].'
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              '.$user['email'].'
              </td>
    
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
';
}

?>