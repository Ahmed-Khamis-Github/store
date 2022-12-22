 <?php include 'inc/header.php' ?>
 <?php require_once 'classes/Products.php' ?>
 <?php require_once 'classes/order.php' ?>
 <?php require_once 'classes/Orderdetails.php' ?>
 <div class="container">
   <div class="row">
     <table class="table">
       <div class="col-lg">
         <thead>
           <tr>
             <th scope="col">Customer Name</th>
             <th scope="col">Customer Email</th>
             <th scope="col">Customer Phone</th>
             <th scope="col">Customer Address</th>
             <th scope="col">Product Name</th>
             <th scope="col">Product Price</th>
           </tr>
         </thead>
         <tbody>
           <?php
            $orderDetails = new Orderdetails();
            $order = new Order();
            $orders = $order->getAll();
            $products = new Products();
            $product = $products->getAll();
            // die ;
            $id = [];
            foreach ($orders as $order) :
              array_push($id, $order['order_id']);
              $get = $orderDetails->getOne($order['order_id']);
              foreach ($get as $gets) :
                $one = $products->getOne($gets['product_id']);
            ?>
               <tr>
                 <td><?php echo   $order['CustomerName'] ?></td>
                 <td><?php echo   $order['CustomerEmail'] ?></td>
                 <td><?php echo   $order['CustomerPhone'] ?></td>
                 <td><?php echo   $order['CustomerAddress'] ?></td>
                 <td><?php echo   $one['name'] ?></td>
                 <td><?php echo   $gets['pirceEach'] ?></td>
               </tr>
             <?php endforeach; ?>
           <?php endforeach; ?>
     </table>
   </div>
 </div>
 </div>