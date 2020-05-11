<?php  
require_once 'database.class.php';

class Controller extends Database 
{ 
    public $db;

    public function __construct()
    { 
        parent::__construct();
    } 

    public function categories_with_total_items()
    {
        $query = $this->db->query("
            SELECT 
                      c.Id, 
                      c.Name, 
                      COUNT(r.ItemNumber) AS Total_Items
            FROM      category AS c
            LEFT JOIN item_category_relations AS r
                   ON r.categoryId = c.Id 
            GROUP BY  c.Id
            ORDER BY  total_items DESC
        ");
 
        $result = array();
        while ($row = $query->fetch_object()) 
        {
           array_push($result, $row);
        } 

        return $result;
    }


    public function categories_treeview_with_total_items()
    {
 
        $query = $this->db->query("
               SELECT 
                         c.Id, 
                         c.Name,
                         cr.ParentcategoryId 
               FROM      category AS c
               LEFT JOIN catetory_relations AS cr
                      ON cr.categoryId = c.Id   
        ");

        $result = array();
        while ($row = $query->fetch_array()) 
        {
           array_push($result, $row);
        }

        return $this->proccessTreeMap($result);
    }
 
 
    protected function proccessTreeMap($data, $ParentcategoryId=0)
    {
        $categories = array();
        for ($i = 0; $i < count($data); $i++)
        {
            if($data[$i]['ParentcategoryId'] == $ParentcategoryId) 
            {
                $categories[] = array(
                    'Id'               => $data[$i]['Id'],
                    'Name'             => $data[$i]['Name'],
                    'ParentcategoryId' => $data[$i]['ParentcategoryId'],
                    'sub_categoires'   => $this->proccessTreeMap($data, $data[$i]['Id'])
                ); 
            }
        }
        return $categories;
    }

}
