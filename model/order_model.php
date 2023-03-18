<?php

include_once __DIR__.'/../include/db.php';
class CustomizeOrder{
private $cont;

public function getorder(){
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT orders.id,orders.customer_id as customerid,users.name,orders.total_quantity,orders.total_balance, orders.promotion_amount, orders.bill, orders.date
             from orders join users where orders.customer_id = users.id order by orders.id DESC";

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;
        }

        public function getName($id){
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT users.name 
            FROM orders JOIN users
            WHERE orders.customer_id=users.id and orders.id=$id";

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $customers=$statement->fetch(PDO::FETCH_ASSOC);
            return $customers;
        }

       

        public function getordereds($id){
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT users.name as cname,products.name,order_details.qty, products.price,order_details.subtotal
            FROM order_details JOIN orders JOIN products join users
            WHERE order_details.order_id = orders.id AND products.id = order_details.product_id AND orders.customer_id=users.id and orders.id=$id";

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;
        }

        public function getorder_details($id){
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT products.name as pname, customize_order_details.qty, products.price,creams.name,dolls.type,sizes.size,customize_order_details.description
            FROM customize_order_details JOIN orders JOIN products join creams join dolls join sizes
            on customize_order_details.order_id = orders.id where products.id = customize_order_details.product_id AND orders.id=:id and customize_order_details.cream_id=creams.id and customize_order_details.doll_id=dolls.id and customize_order_details.size_id=sizes.id";

            $statement=$this->cont->prepare($sql);
            $statement->bindParam(':id',$id);

            $statement->execute();

            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;
        }
        

        public function getfilter($start_date,$end_date){
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT orders.id,orders.customer_id as customerid,users.name,orders.total_quantity,orders.total_balance, orders.promotion_amount, orders.bill, orders.date
             from orders join users where orders.customer_id = users.id and DATE(orders.date)>='$start_date' and DATE(orders.date)<='$end_date'" ;

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;
        }

        
        public function getData($id)
        {
            $this->cont = Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select * from users join orders where orders.id=:id and orders.customer_id=users.id";
            $statement = $this->cont->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->execute();
            $result = $statement->fetch(pdo::FETCH_ASSOC);
            return $result;
        }

        public function countOrders()
        {
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT COUNT(id) as count_order FROM orders";
            $statement=$this->cont->prepare($sql);
            $statement->execute();
            $customers=$statement->fetch(PDO::FETCH_ASSOC);
            return $customers;   
        }
        
        public function bargraph($year)
        {
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT MONTHNAME(date) as monthname,YEAR(date) as year,SUM(total_quantity) as toal_qty 
                    FROM orders 
                    WHERE YEAR(date)='$year'
                    GROUP BY MONTH(date),year";
            $statement=$this->cont->prepare($sql);
            $statement->execute();
            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;   
        }

        public function bargraphIncome($year)
        {
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT MONTHNAME(date) as monthname,YEAR(date) as year,SUM(total_balance) as total_balance 
                    FROM orders 
                    WHERE YEAR(date)='2023'
                    GROUP BY MONTH(date),year";
            $statement=$this->cont->prepare($sql);
            $statement->execute();
            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;   
        }

        public function pieChartData($year)
        {
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT COUNT(order_details.qty) as count , categories.name as product_name
            FROM order_details JOIN products JOIN categories JOIN orders
            WHERE order_details.product_id=products.id AND products.category_id=categories.id  AND order_details.order_id=orders.id AND YEAR(date)='$year'
            GROUP BY categories.id";
            $statement=$this->cont->prepare($sql);
            $statement->execute();
            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;   
        }

        public function pieChartDataCustomize($year)
        {
            $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT COUNT(customize_order_details.qty) as count , products.name as product_name
                    FROM customize_order_details JOIN products JOIN categories JOIN orders
                    WHERE customize_order_details.product_id=products.id AND customize_order_details.order_id=orders.id AND YEAR(date)='$year'
                    GROUP BY product_id";
            $statement=$this->cont->prepare($sql);
            $statement->execute();
            $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $customers;   
        }

       
    }
        
      