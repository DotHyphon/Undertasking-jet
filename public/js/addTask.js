function addTask(day, week, user, title) {
    axios.post('/tasks/create', {
        title: title,
        week: week,
        day: day,
        user: user,
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function test(day) {
    console.log(day);
}