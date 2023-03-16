<?php
include_once  __DIR__.'/../include/db.php';
class Report{
    private $cont;
    public function getOrderDetail(){
        $this->cont=Database::connection();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
            FROM order_details JOIN orders JOIN products
            WHERE order_details.order_id = orders.id AND products.id = order_details.product_id";

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }

    public function getfilter($start_date,$end_date, $category_id){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products JOIN categories
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id and orders.date>='$start_date' and orders.date<='$end_date' and products.category_id = categories.id AND categories.id = $category_id" ;

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function byCategory($category_id){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products JOIN categories
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id and products.category_id = categories.id AND categories.id = $category_id" ;

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function byDate($start_date,$end_date){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products JOIN categories
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id and categories.id = products.category_id AND orders.date>='$start_date' and orders.date<='$end_date'" ;

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function categoryName(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select * from categories" ;

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function byMonth($month){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id AND MONTH(orders.date) = $month";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function byYear($year){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id AND YEAR(orders.date) = $year";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function byYearMonth($year, $month){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT order_details.id, products.name, order_details.qty, order_details.subtotal, orders.date
        FROM order_details JOIN orders JOIN products
        WHERE order_details.order_id = orders.id AND products.id = order_details.product_id AND YEAR(orders.date) = $year and MONTH(orders.date) = $month";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function customizeReport(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT customize_order_details.id, products.name, customize_order_details.qty, customize_order_details.subtotal, orders.date
        FROM customize_order_details JOIN orders JOIN products
        WHERE customize_order_details.order_id = orders.id AND products.id = customize_order_details.product_id";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function customizeByDate($start_date, $end_date){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT customize_order_details.id, products.name, customize_order_details.qty, customize_order_details.subtotal, orders.date
            FROM customize_order_details JOIN orders JOIN products
            WHERE customize_order_details.order_id = orders.id AND products.id = customize_order_details.product_id AND orders.date>='$start_date' and orders.date<='$end_date'";

            $statement=$this->cont->prepare($sql);

            $statement->execute();

            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }

    public function customizeByMonth($month){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT customize_order_details.id, products.name, customize_order_details.qty, customize_order_details.subtotal, orders.date
        FROM customize_order_details JOIN orders JOIN products
        WHERE customize_order_details.order_id = orders.id AND products.id = customize_order_details.product_id AND MONTH(orders.date) = $month";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function customizeByYear($year){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT customize_order_details.id, products.name, customize_order_details.qty, customize_order_details.subtotal, orders.date
        FROM customize_order_details JOIN orders JOIN products
        WHERE customize_order_details.order_id = orders.id AND products.id = customize_order_details.product_id AND YEAR(orders.date) = $year";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function customizeByMonthYear($month, $year){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT customize_order_details.id, products.name, customize_order_details.qty, customize_order_details.subtotal, orders.date
        FROM customize_order_details JOIN orders JOIN products
        WHERE customize_order_details.order_id = orders.id AND products.id = customize_order_details.product_id AND YEAR(orders.date) = $year and MONTH(orders.date) = $month";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getYear(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT DISTINCT YEAR(orders.date) as year from orders";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findMax(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT products.name, SUM(order_details.qty) as total
        FROM order_details JOIN products
        WHERE order_details.product_id = products.id 
        GROUP BY product_id";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findCustomizeMax(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT products.name, SUM(customize_order_details.qty) as total
        FROM customize_order_details JOIN products
        WHERE customize_order_details.product_id = products.id 
        GROUP BY product_id";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function totalPriceForOrder(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT SUM(order_details.subtotal)
                FROM order_details ";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function totalPriceForCustomizeOrder(){
        $this->cont=Database::connection();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT SUM(customize_order_details.subtotal)
                FROM customize_order_details ";

        $statement=$this->cont->prepare($sql);

        $statement->execute();

        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    

}
?>


<!-- SELECT
MONTH(orders.date) as month,
YEAR(orders.date) as year
FROM orders
GROUP BY orders.date -->

<!--  -->