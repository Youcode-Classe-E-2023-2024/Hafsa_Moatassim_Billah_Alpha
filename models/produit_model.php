<?php

$api_url = "https://jsonplaceholder.typicode.com/posts";
$products_json = file_get_contents($api_url);
$products = json_decode($products_json, true);
?>

   <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Title
                            
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Description
                            
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action

                        </div>
                    </th>
                </tr>
            </thead>
            <?php foreach ($products as $product) { ?>

            <tbody>
                <tr class="bg-gray-50 text-center">
                    
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r"> <?php echo $product['title']?> </td>
                    <td class="p-2 border-r"> <?php echo $product['body']?> </td>
                    <td class="flex space-x-2">
                        <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                        <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                    </td>
                </tr>
                
                
            </tbody>
            <?php }?>
        </table>
    </div>

