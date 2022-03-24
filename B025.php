<?php
// 自分の得意な言語で
// Let's チャレンジ！！
$input_line = fgets(STDIN);
$p = explode(" ", $input_line);
$p0 = (int)$p[0];
$p1 = (int)$p[1];
$p2 = (int)$p[2];
//うさぎの初期値
$k = array();
for ($i = 0; $i < $p1; $i++) {
    $y = fgets(STDIN);
    $k[] = (int) $y;
}
//フィールド
$number = range(1, $p0);
$k1 = array();
for ($i = 1; $i <= $p0; $i++) {
    $s = 0;
    for ($u = 0; $u < $p1; $u++) {
        if ($i === $k[$u]) {
            $k1[$i] = $number[$u];
        } else {
            $s = $s + 1;
        }
    }

    if ($s === $p1) {
        $k1[$i] = 0;
    }
}
//var_dump($k1);

//フィールド拡張
for ($i = $p0 + 1; $i <= $p0 * $p2; $i++) {
    $k1[$i] = 0;
}

//うさぎの位置を入れ替え
for ($l = 1; $l <= $p1 * $p2; $l++) {
    $e = 0;
    if ($l % $p1 === 0) {
        $e = $p1;
    } else {
        $e = $l % $p1;
    }
    for ($i = $p0 * $p2; $i > 0; $i--) {
        if ($k1[$i] === $number[$e - 1]) {
            $j = 0;
            for ($t = 0; $t < $p0 * $p2; $t++) {
                if ($k1[$i + $number[$t]] === 0) {
                    $j = ($i + $number[$t]);
                    $k1[$j] = $k1[$i];
                    $k1[$i] = 0;
                }
            }
        }
    }
}
//var_dump($k1);
//キーを取得してフィールドを戻す
$b = 0;
for ($i = 0; $i < $p1; $i++) {
    $b = array_search($number[$i], $k1);
    if ($b % $p0 === 0) {
        echo $p0 . "\n";
    } else {
        echo $b % $p0 . "\n";
    }
}
