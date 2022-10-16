<?php
class Edge {
    public $start;
    public $end;
    public int $weight;
}

$edgesRaw = [
    ['S', 8, 'E'],
    ['E', 1, 'D'],
    ['D', -1, 'C'],
    ['S', 10, 'A'],
    ['D', -4, 'A'],
    ['A', 2, 'C'],
    ['C', -2, 'B'],
    ['B', 1, 'A'],
];

$vertices = [
    'S' => PHP_INT_MAX,
    'A' => PHP_INT_MAX,
    'B' => PHP_INT_MAX,
    'C' => PHP_INT_MAX,
    'D' => PHP_INT_MAX,
    'E' => PHP_INT_MAX,
];

#prepare array of edges listed by edge start to simplyfy Bellman-Ford updating weights of other edges 
$edges = [];
foreach($edgesRaw as $edgeRaw) {
    $edge = new Edge();
    $edge->start = $edgeRaw[0];
	$edge->end = $edgeRaw[2];
	$edge->weight = $edgeRaw[1];
    if (! isset($edges[$edgeRaw[0]])) {
		$edges[$edgeRaw[0]] = [];
	}
	$edges[$edgeRaw[0]][] = $edge;
}
 

function bellmanFord($vertices, $edges, $start)
{
    $change = true;
    $round = 1;
    while ($change) {
    	echo "round $round\n";
        $change = false;
	    foreach ($vertices as $vertice => $minWeight) {
	    	echo "checking vertice $vertice\n";
		    if ($start === $vertice) {
			    $vertices[$vertice] = 0;
			}
		        
			foreach ($edges[$vertice] as $edge) {
			    if ($vertices[$edge->end] > $vertices[$vertice] + $edge->weight ) {
			    	echo "replace $vertice " .$vertices[$edge->end] . " with " .  $vertices[$vertice] + $edge->weight .  "\n ";
				    $vertices[$edge->end] =  $vertices[$vertice] + $edge->weight;
				    $change = true;
				}
			}
		}
		$round++;
	}
    return $vertices;
}


$result = bellmanFord($vertices, $edges, 'S');

//show result
var_dump($result);
