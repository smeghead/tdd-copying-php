# テスト駆動開発(国際通貨)を写経する

t_wadaさんが、テスト駆動開発の写経を勧めていたので、PHPで写経してみます。

https://twitter.com/t_wada/status/1334561597

## Open shell

```bash
docker-compose run --rm php_cli bash
```

## Diagrams

各章の時点でのクラス図の記録です。自作ツールのphp-class-diagramで出力しています。

### 第1部

#### 第1章 仮実装

![Chapter 1](diagrams/chapter1.png)

#### 第2章 明白な実装

![Chapter 2](diagrams/chapter2.png)

#### 第3章 三角測量

![Chapter 3](diagrams/chapter3.png)

#### 第4章 意図を語るテスト

![Chapter 4](diagrams/chapter4.png)

#### 第5章 原則をあえて破るとき

![Chapter 5](diagrams/chapter5.png)

#### 第6章 テスト不足に気づいたら

![Chapter 6](diagrams/chapter6.png)

#### 第7章 疑念をテストに翻訳する

![Chapter 7](diagrams/chapter7.png)

#### 第8章 実装を隠す

![Chapter 8](diagrams/chapter8.png)

#### 第9章 歩幅の調整

![Chapter 9](diagrams/chapter9.png)

#### 第10章 テストに聞いてみる

![Chapter 10](diagrams/chapter10.png)

#### 第11章 不要になったら消す

![Chapter 11](diagrams/chapter11.png)

#### 第12章 設計とメタファー

![Chapter 12](diagrams/chapter12.png)

#### 第13章 実装を導くテスト

![Chapter 13](diagrams/chapter13.png)

#### 第14章 学習用テストと回帰テスト

PHPでは連想配列のキーにObjectを指定することができなかったので、RateResolverを追加してMapの替わりとしました。

![Chapter 14](diagrams/chapter14.png)

#### 第15章 テスト任せとコンパイラ任せ

![Chapter 15](diagrams/chapter15.png)

#### 第16章 将来の読み手を考えたテスト

![Chapter 16](diagrams/chapter16.png)
