<?php

$totalWeight = 0; // 現在の積載量
$truckCount = 0; // トラックの台数

$packages = range(1, 777); // 荷物の重さの配列

foreach ($packages as $package) {
    $totalWeight += $package; // 荷物を積載

    if ($totalWeight > 5000) {
        $truckCount++; // 新しいトラックを用意
        $totalWeight = $package; // 新しいトラックに最初の荷物を積載
    }
}

$truckCount++; // 最後のトラックをカウント

echo "必要なトラックの台数: " . $truckCount . "\n";

?>




