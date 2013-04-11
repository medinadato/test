<?php

trait A {

	public function helloWorld() {
		echo "Hi World A";
	}

}

trait B {

	public function helloWorld() {
		echo "Hi World B";
	}

}

class Foo {

	use A, B {
		A::helloWorld insteadof B;
	}
}

$object = new Foo();

$object->helloWorld();
