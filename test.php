<?

require_once("vendor/autoload.php");

class A
{
    public $input;
    public function __construct($input)
    {
        $this->input = $input;
    }
}


$arr = [];
$arr[] = new A("1");
$arr[] = new A("2");
$arr[] = new A("3");
$arr[] = new A("4");

$obj = new R\DataList($arr);

$copy = $obj->asArray();

$copy[0]->input = "5";
print_r($copy);

print_r($obj);
