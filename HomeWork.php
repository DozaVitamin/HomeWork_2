<?php
   class Heap{

    private $heap = Array();

    function __construct(...$elements)
    {
        if ($elements != null){
            foreach ($elements as $element){
                $this->push($element);
            }
        }
    }


    public function push(...$elements){
        //use this function to add a new element
        foreach ($elements as $element){
            $this->heap[] = $element;
            $this->sort();
        }

    }

    public function pop(){
        //use this function to delete the last (the biggest) element of the heap
        if(!$this->isEmpty()){
            unset($this->heap[count($this->heap) - 1]);
        } else{
            echo("No elements to delete.");
        }
    }

    public function  peek(){
        //use this function to get the last element of the heap
        if(!$this->isEmpty()){
            return($this->heap[count($this->heap) - 1]);
        } else{
            echo("No elements to show.");
            return null;
        }
    }

    public function isEmpty(){
        //use this function to check if heap is empty
        return empty($this->heap);
    }

    private function sort(){ //I wasn't sure whether I was allowed to use integrated PHP functions of sorting,
        $switch = true;     //  that's why I wrote my own function, based on bubble sorting algorithm
        while ($switch){
            $switch = false;
            for($i = 0; $i < count($this->heap) - 1; $i++){
                if($this->heap[$i] > $this->heap[$i+1]){
                    $temp = $this->heap[$i+1];
                    $this->heap[$i+1] = $this->heap[$i];
                    $this->heap[$i] = $temp;
                    $switch = true;
                }
            }
        }
    }


    public function printAll(){
        //This function is just for convenient checking how my class works. Not for use.
        print("</br> Checking function </br>");
        foreach ($this->heap as $a){
            print($a."</br>");
        }
        var_dump($this->heap);
        print("</br></br>");

    }

    public function printAsBinaryTree(){
        //CHECK OUT THIS FUNCTION!!! just for fun.
        $heap = $this->heap;
        $power = 0;
        $number = 1;
        echo("
        <html>
        <body>
        <div style='text-align: center;'>
        ");
        while(!empty($heap)){
            for($i = 0; $i < $number; $i++){
                if($i == $number/2){
                    print("<font style='padding-right: 20px;'>|</font>");
                }
                print ("<font style='padding-right: 20px;'>".$heap[count($heap) - 1]."</font>");

                if($i%2 != 0 && $number > 4){
                    print("<font style='padding-right: 20px;'>|</font>");

                }

                unset ($heap[count($heap) - 1]);
            }
            print("</br></br>");
            $power++;
            $number = pow(2, $power);
        }
        echo ("
        </div>
        </body>
        </html>
        ");

        print("Ну вот, типа бинарное дерево гыгыгы. ");
    }

   }

    //these are some values for fast checking how my class works.
    //$myHeap = new Heap(); //uncomment this to check how it works with 0 objects in array
    $myHeap = new Heap("mdaaa",1,21,7,3,4,2,6,9,5,41, "lol");//comment this to check how it works with 0 objects in array
    $myHeap->printAll();
    var_dump($myHeap->peek());
    $myHeap->pop();
    $myHeap->printAll();
    $myHeap->push(11,3);
    $myHeap->printAll();
//        $myHeap = new Heap(1,21,7,3,4,0,2,6,9,5,41,3,5,54,3,5,34,5,43,53,4,5,3,4,5,35,2,4,42,34,234);
//        $myHeap->printAsBinaryTree(); // try this to build binary tree!!!




    //by the way - are we gonna get any feedback about our homework? because like it's kinda important
    // to know whether you are doing everything right or to know what you need to improve



?>