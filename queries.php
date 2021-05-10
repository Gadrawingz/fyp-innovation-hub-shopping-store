<?php
include ('connection.php');
class InnovQuery {

	public $dbconn;
	public function __construct(){
		$obj = new DatabaseConn;
		$this->dbconn= $obj->connection();
	}
	


	// All about Innovators A.K.A shop owners
	public function addInnovator($fn, $ln, $uname, $email, $telno, $pass, $shop_id){
		$sql= "INSERT INTO `shop_owners`(`user_id`, `firstname`, `lastname`, `username`, `email`, `shop_id`, `password`, `telnumber`, `status`, `date_created`) VALUES (null,'".$fn."', '".$ln."','".$uname."','".$email."', '".$shop_id."', '".$pass."','".$telno."', '1', NOW())";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}

	// User login & Registration
	public function soLogin(){
		$sql= "SELECT * FROM shop_owners WHERE email='".$_POST['email']."' && password='".$_POST['password']."' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}

    public function view_innovators(){
		$query= $this->dbconn->prepare("SELECT * FROM shop_owners ");
		$query->execute();
		return $query;
	}

    public function view_one_innovator($id){
		$query= $this->dbconn->prepare("SELECT * FROM shop_owners WHERE user_id='$id' ");
		$query->execute();
		return $query;
	}

	public function deleteInnovator($id){
		$query= $this->dbconn->prepare("DELETE FROM shop_owners WHERE user_id='$id' ");
		$query->execute();
		return $query;
	}

	public function updateInnovator($fname, $lname, $uname, $email, $tel, $uid) {
		$sql="UPDATE `shop_owners` SET firstname='$fname', lastname='$lname', username= '$uname', email='$email', telnumber='$tel' WHERE user_id='$uid' ";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function retrieveInnovatorName($uid){
		$sql= "SELECT * FROM shop_owners WHERE user_id='$uid' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}

	public function countInnovationsPerOwner($uid) {
		$sql = "SELECT COUNT(*) FROM products WHERE user_id='$uid' ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}








	// All about shops

	public function add_shop($sn, $sl, $so){
		$sql= "INSERT INTO `shops`(`shop_id`, `shop_name`, `shop_location`) VALUES (null,'".$sn."', '".$sl."')";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}


    public function view_all_shops(){
		$query= $this->dbconn->prepare("SELECT * FROM shops ");
		$query->execute();
		return $query;
	}

    public function view_one_shop($id){
		$query= $this->dbconn->prepare("SELECT * FROM shops WHERE shop_owner='$id' ");
		$query->execute();
		return $query;
	}


    public function countIfShopNameIsAvailable($id){
		$sql= "SELECT COUNT(shop_name) FROM shops WHERE shop_owner='$id' ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;
	}

    public function viewShopNameByShopOwner($id){
		$query= $this->dbconn->prepare("SELECT shop_id, shop_name FROM shops WHERE shop_owner='$id' ");
		$query->execute();
		return $query;
	}

	public function getShopsDataByShopOwnerId($id) {
		$sql= "SELECT * FROM shops LEFT JOIN shop_owners ON shop_owners.user_id=shops.shop_id LEFT JOIN products ON products.prod_id = shop_owners.user_id WHERE shop_owner='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}

	public function viewAvailableShops(){
		$sql= "SELECT * FROM shops WHERE shop_owner='0' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}


	public function viewAvailableShOwners(){
		$sql= "SELECT * FROM shop_owners ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}

	// Get shop name from shop_id
    public function viewshopNameFromId($id){
		$query= $this->dbconn->prepare("SELECT * FROM shops  WHERE shop_id='$id' ");
		$query->execute();
		return $query;
	}


    public function getLastInsertedShopOwnerId(){
		$query= $this->dbconn->prepare("SELECT * FROM shop_owners ORDER BY user_id DESC LIMIT 1");
		$query->execute();
		return $query;
	}

	public function updateShopTable($shop_owner, $shop_id) {
		$sql="UPDATE `shops` SET shop_owner='$shop_owner' WHERE shop_id='$shop_id' ";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function deleteOneShop($id){
		$query= $this->dbconn->prepare("DELETE FROM shops WHERE shop_id='$id' ");
		$query->execute();
		return $query;
	}

    public function viewOneShopById($id){
		$query= $this->dbconn->prepare("SELECT * FROM shops WHERE shop_id='$id' ");
		$query->execute();
		return $query;
	}

	public function updateOneShop($shop_name, $shoploc, $id) {
		$sql="UPDATE `shops` SET shop_name='$shop_name', shop_location='$shoploc' WHERE shop_id='$id' ";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}











    public function view_prodcategories(){
		$query= $this->dbconn->prepare("SELECT * FROM pcategories ");
		$query->execute();
		return $query;
	}

	public function uploadInnovation($title, $imgname, $tmp, $cat, $desc, $price, $qty, $uploader) {

		move_uploaded_file($tmp,"innovations/".$imgname);

		$sql= "INSERT INTO `products`(`prod_name`, `prod_image`, `prod_category`, `prod_price`, `prod_code`, `user_id`, `prod_description`, `prod_quantity`, `date_published`) VALUES ('".$title."', '".$imgname."', '".$cat."', '".$price."', 'INN-".rand(10, 10000)."', '".$uploader."', '".$desc."', '".$qty."', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}

	public function viewInnovationsPerOwner($uid){
		$sql= "SELECT * FROM products WHERE user_id='$uid' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}	


	public function viewAllInnovations(){
		$sql= "SELECT * FROM products ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}

	public function viewInnovationsByCategories($categ){
		$sql= "SELECT * FROM products WHERE prod_category='$categ' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}


	public function viewOneCategory($id){
		$sql= "SELECT * FROM pcategories WHERE cat_id='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}	

	public function returnProductDataFromId($id) {
		$sql = "SELECT * FROM products WHERE prod_id='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}	

	public function viewOneInnovationById($id) {
		$sql = "SELECT * FROM products WHERE prod_id='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}
	
	public function updateInnovation($pname, $desc, $price, $quantity, $id) {
		$sql="UPDATE `products` SET prod_name='$pname', prod_description='$desc', prod_price= '$price', prod_quantity='$quantity' WHERE prod_id='$id' ";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}














	// Customer Data

	public function registerCustomer($fn,$ln,$uname,$mail,$pass,$telno,$dist,$sect) {

		$sql = "INSERT INTO `customers`(`client_id`, `firstname`, `lastname`, `username`, `email`, `password`, `telnumber`, `district`, `sector`, `date_created`) VALUES (null, '".$fn."', '".$ln."', '".$uname."', '".$mail."', '".$pass."', '".$telno."', '".$dist."', '".$sect."', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function getCustomerDtByProdId($id) {
		$sql = "SELECT * FROM customers LEFT JOIN products ON products.prod_id=customers.client_id WHERE prod_id='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}

	public function custLogin(){
		$sql= "SELECT * FROM customers WHERE email='".$_POST['email']."' && password='".$_POST['password']."' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}


    public function view_customers() {
		$query= $this->dbconn->prepare("SELECT * FROM customers ");
		$query->execute();
		return $query;
	}

    public function returnCustomerNameById($id) {
		$query= $this->dbconn->prepare("SELECT * FROM customers WHERE client_id ='$id' ");
		$query->execute();
		return $query;
	}

    public function returnCustomerDataById($id) {
		$query= $this->dbconn->prepare("SELECT * FROM customers WHERE client_id ='$id' ");
		$query->execute();
		return $query;
	}












	// Cart Queries
	public function addItemToCart($user, $innov, $quantity, $showner) {

		$sql = "INSERT INTO `shoppingcart`(`cart_id`, `client_id`, `prod_id`, `prod_quantity`, `shop_owner`, `is_carted`, `date_added`) VALUES (null, '".$user."', '".$innov."', '".$quantity."', '".$showner."', '1', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function returnCartDataByCartId($id) {
		$sql = "SELECT * FROM shoppingcart WHERE cart_id='$id' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}


	public function viewCustomerOrders($id) {
		$sql = "SELECT * FROM shoppingcart; ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}


	// Customer side (View order history)
	public function viewOrdersHistoryPerCustomer($cust_id) {
		$sql = "SELECT * FROM api_payment WHERE cust_id= $cust_id ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}

	public function countOrdersHistoryPerCustomer($cust_id) {
		$sql = "SELECT COUNT(*) FROM api_payment WHERE cust_id= $cust_id ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	// Innovator side (View order history)
	public function viewOrdersHistoryPerInnovator($innov) {
		$sql = "SELECT * FROM api_payment WHERE shop_owner= '$innov' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;		
	}

	public function countOrdersHistoryPerInnovator($innov) {
		$sql = "SELECT COUNT(*) FROM api_payment WHERE shop_owner= '$innov' ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	// conf orders
	public function orderCustConfirmation($payment_id) {
		$sql="UPDATE `api_payment` SET status='Confirmed' WHERE payment_id='$payment_id' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function countCartItems($uid) {
		$sql = "SELECT COUNT(*) FROM shoppingcart WHERE client_id='$uid' ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	// Lecturer remark
	public function viewCartItemsPerClient($uid){
		$sql= "SELECT c.*,p.prod_name FROM `shoppingcart` AS c, `products` AS p WHERE C.`prod_id`=P.prod_id AND c.client_id='$uid' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}



    public function deleteCartItem($cid){
		$query= $this->dbconn->prepare("DELETE FROM shoppingcart WHERE cart_id='$cid' ");
		$query->execute();
		return $query;
	}


	public function getShCartItemsTotal($client){
		$sql= "SELECT SUM(prod_price) AS TotalSum FROM `shoppingcart` WHERE client_id='$client' ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt; 
	}


	// ORDERS RELATED QUERIES @2021/ March 14th

	public function finalizeCheckoutStage($prod_id, $qty, $itemby, $cust, $totalprice) {

		$sql = "INSERT INTO `sales`(`sale_id`, `prod_id`, `sale_price`, `sale_quantity`, `seller`, `buyer`, `delivery_status`, `sale_date`) VALUES (null, '".$prod_id."','".$totalprice."', '".$qty."', '".$itemby."', '".$cust."', '0', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	// Complete checkout
	public function completeCheckoutStep($cust, $cart_id, $phone, $code, $quantity, $status) {
		$sql = "INSERT INTO `checkout`(`ch_id`, `cust_id`, `cart_id`, `telnumber`, `generated_code`, `amount`, `status`, `ch_date`) VALUES (null, '".$cust."', '".$cart_id."', '".$phone."', '".$code."', '".$quantity."', '".$status."', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}







	// COUNTING * STATISTICS
	public function countAllCustomers() {
		$sql = "SELECT COUNT(*) FROM customers";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countAllShops() {
		$sql = "SELECT COUNT(*) FROM shops";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countAllInnovators() {
		$sql = "SELECT COUNT(*) FROM shop_owners ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}


	public function countAllInnovations() {
		$sql = "SELECT COUNT(*) FROM products ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}


	public function countAllSales() {
		$sql = "SELECT COUNT(*) FROM sales ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}



	// Payment
	public function paymentInitialization($prod_id, $cust, $shop_owner, $amount, $cart_id, $taxrate) {
		$sql = "INSERT INTO `api_payment`(`payment_id`, `cust_id`, `shop_owner`, `prod_id`, `paid_amount`, `reference`, `cart_id`, `payment_method`, `status`, `payment_date`) VALUES (null, '".$cust."', '".$shop_owner."', '".$prod_id."', '".$amount."', '200', '".$cart_id."', 'MoMoPayment', 'Pending', NOW())";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function createOrderForCustomer($cust, $cart_id) {
		$sql = "INSERT INTO `all_orders`(`order_id`, `cart_id`, `orderedby`,  `order_date`, `order_success`, `shipper_id`, `ship_status`, `required_date`, `shipped_date`) VALUES (null, '".$cart_id."', '".$cust."', NOW(), '0', '1', 'Pending', '', '')";
		$query=$this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}
	
	public function updateProductQuantity($prod_id, $soldqty) {
		// Here There are some conflicts, when its time when 
		// many people is purchasing simultaneously 
		$sql="UPDATE `products` SET prod_quantity='$soldqty' WHERE prod_id='$prod_id' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;		
	}

	public function getCustomerOrderData($oid) {

		$sql= "SELECT * FROM all_orders WHERE orderedby=? ";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute([$oid]);
		return $stmt; 
	}

	public function verify_customer_orders($oid) {
		$sql = "SELECT COUNT(*) FROM all_orders WHERE orderedby='$oid' ";
		$stmt= $this->dbconn->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function get_payment($id){
		$query= $this->dbconn->prepare("SELECT * FROM api_payments WHERE payment_id=? ");
		$query->execute([$id]);
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function update_payment($id, $status){
		try{
			$query = $this->dbconn->prepare("UPDATE api_payments SET status = ? WHERE payment_id = ?");
			$query->execute([$status, $id]);
		} catch(\Exception $e){
			// var_dump($params);
			throw new Exception($e->getMessage(), 1);
			
		}
		return true;
	}






}
?>