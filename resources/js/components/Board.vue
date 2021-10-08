<template>
    <div class="d-flex col board">
        <div class="col-3 h-auto board-column">
            <h5>Product backlog</h5>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
            <button class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </button>
        </div>
        <div class="col-3 board-column">
            <h5>To do</h5>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
        </div>
        <div class="col-3 board-column">
            <h5>In progress</h5>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
        </div>
        <div class="col-3 board-column">
            <h5>Testing</h5>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
        </div>
        <div class="col-3 board-column">
            <h5>Done</h5>
            <div class="col-8 mt-3 card">
                <h5 class="card-title">Card example</h5>
                <h6 class="card-description">Example of user card that can be displayed here</h6>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Board"
}
</script>

<style scoped>
    .board {
        margin-top: 4em;
        flex-wrap: nowrap;
        align-items: flex-start;
    }

    .board-column {
        background-color: #dee0e3;
        margin: 0 15px 0 25px;
        width: 18em;
        padding: 15px;
        flex: auto;
    }

    .card {
        height: auto;
        width: 97%;
        padding: 6px 6px 6px 15px;
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #74787e;
    }

    .card-description {
        margin-top: 15px;
    }

    .add-card {
        margin-top: 1.5em;
        border: none;
        width: 97%;
    }

</style>
