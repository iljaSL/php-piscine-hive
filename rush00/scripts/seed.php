#!/usr/bin/php
<?php

$link = mysqli_connect("127.0.0.1", "root", "rootpasswd", "rush00");

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Grey Shirt Men','shirts', 'formal', 'A great shirt!', 100, 'https://images.unsplash.com/photo-1459204137123-238c569e22bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2253&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Black Formal Shirt Men','shirts', 'formal', 'A great black shirt!', 150, 'https://images.unsplash.com/photo-1474583846830-43fa959fc6ee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2253&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Casual Shirt Men','shirts', 'casual', 'A great striped shirt!', 80, 'https://images.unsplash.com/photo-1547280552-243a8c441672?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2346&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Green Jack Shirt Men','shirts', 'casual', 'A great green shirt!', 60, 'https://images.unsplash.com/photo-1551628723-952088378fd3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2251&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('White Long Sleeve Shirt Men','shirts', 'longsleve', 'A great white long sleeve shirt!', 50, 'https://images.unsplash.com/photo-1472415825778-0e0a7f363a64?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Black Crewneck Hoodie Men','hoodies', 'crewneck', 'A great hoodie!', 60, 'https://images.unsplash.com/photo-1523914088562-e94af834794e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Black Summer Crewneck Hoodie Men','hoodies', 'crewneck', 'A great crewneck!', 30, 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-1.2.1&auto=format&fit=crop&w=2251&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Zip Up Hoodie Black Men','hoodies', 'zip', 'A hoodie!', 80, 'https://images.unsplash.com/photo-1583454006900-4c80b3c50ce6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('White Zip Up Hoodie Woman','hoodies', 'zip', 'A great Hoodie!', 80, 'https://images.unsplash.com/photo-1467271891377-355028f2f363?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Nice Winter Hoodie Woman','hoodies', 'crewneck', 'A great Hoodie!', 100, 'https://images.unsplash.com/photo-1507295051087-13bdc23971f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Parka','jacket', 'parkas', 'A great Parka!', 120, 'https://images.unsplash.com/photo-1563712013297-7a6a3c884ad0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Nice Parka','jacket', 'parkas', 'A great Parka!', 130, 'https://images.unsplash.com/photo-1556098539-3019e1bdf05e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2851&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Awesome Coat','jacket', 'coats', 'A great Coat!', 140, 'https://images.unsplash.com/photo-1520980085007-b03e4f66f6a0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Great Coat','jacket', 'coats', 'A great Coat!', 150, 'https://images.unsplash.com/photo-1517832207067-4db24a2ae47c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Nice Sport Shoe','shoes', 'sportshoe', 'A great Shoe!', 55, 'https://images.unsplash.com/photo-1579338793806-848e357b3ee3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Nice Sport Runners','shoes', 'sportshoe', 'A great Shoe!', 75, 'https://images.unsplash.com/photo-1584385154244-2f6db34829c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Casual Shoe','shoes', 'casualshoe', 'A great Shoe!', 89, 'https://images.unsplash.com/photo-1582213153939-613105f23a1b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");
mysqli_query($link, "INSERT INTO rush00.items (`name`, `type`, `typeof`, `description`, `price`, `img`) VALUES ('Nice Casual Shoe','shoes', 'casualshoe', 'A great Shoe!', 90, 'https://images.unsplash.com/photo-1553440070-7b7e896ed9e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60')");


?>