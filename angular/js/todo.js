function TodoCtrl($scope) {
    
    $scope.todos = [
        {text:'Learn AngularJS', done:false}, 
        {text:'Build a App', done:false}
    ];
    
    $scope.getTotalTodos = function () {
        return $scope.todos.length;
    }
    
    $scope.clearCompleted = function () {
//        $scope.todos = _.filter($scope.todos, function(todo) { return !todo.done; }) // something needs to be done regards to underscore.js
        var oldTodos = $scope.todos;
        $scope.todos = [];
        angular.forEach(oldTodos, function(todo) {
            if (!todo.done) $scope.todos.push(todo);
        });
    }
    
    $scope.addTodo = function () {
        $scope.todos.push({text:$scope.formTodoText, done:false});
        $scope.formTodoText = '';
    };
}