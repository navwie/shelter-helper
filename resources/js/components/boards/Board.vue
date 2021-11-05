<template>
    <not-such-selected-projects v-if="computedProjects === 'null'"/>
    <div v-else class="d-flex col board">
        <input type="hidden" name="_token" :value="this.csrfToken">
        <div class="col-3 h-auto board-column">
            <h5 class="board-title">Product backlog</h5>
            <draggable
                class="list-group"
                :list="this.backlogCardsDrag"
                group="tasks"
                @start="startDrag"
                @end="endDrag"
            >

                <board-card
                    v-for="card in this.backlogCardsDrag"
                    :key="card.id"
                    :id="card.id"
                    :name="card.name"
                    :description="card.description"
                    :deadline="card.deadline"
                    :assign_users="assign_users"
                />

            </draggable>
            <a href="/createCard/backlog" class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </a>
        </div>

        <div class="col-3 board-column">
            <h5 class="board-title">To do</h5>
            <draggable
                class="list-group"
                :list="this.todoCardsDrag"
                group="tasks"
                @start="startDrag"
                @end="endDrag"
            >

                <board-card
                    v-for="card in this.todoCardsDrag"
                    :key="card.id"
                    :id="card.id"
                    :name="card.name"
                    :description="card.description"
                    :deadline="card.deadline"
                    :assign_users="assign_users"
                />

            </draggable>
            <a href="/createCard/toDo" class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </a>
        </div>
        <div class="col-3 board-column">
            <h5 class="board-title">In progress</h5>
            <draggable
                class="list-group"
                :list="this.inProgressCardsDrag"
                group="tasks"
                @start="startDrag"
                @end="endDrag"
            >

                <board-card
                    v-for="card in this.inProgressCardsDrag"
                    :key="card.id"
                    :id="card.id"
                    :name="card.name"
                    :description="card.description"
                    :deadline="card.deadline"
                    :assign_users="assign_users"
                />

            </draggable>
            <a href="/createCard/inProgress" class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </a>
        </div>
        <div class="col-3 board-column">
            <h5 class="board-title">Testing</h5>
            <draggable
                class="list-group"
                :list="this.testingCardsDrag"
                group="tasks"
                @start="startDrag"
                @end="endDrag"
            >

                <board-card
                    v-for="card in this.testingCardsDrag"
                    :key="card.id"
                    :id="card.id"
                    :name="card.name"
                    :description="card.description"
                    :deadline="card.deadline"
                    :assign_users="assign_users"
                />

            </draggable>
            <a href="/createCard/testing" class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </a>
        </div>
        <div class="col-3 board-column">
            <h5 class="board-title">Done</h5>
            <draggable
                class="list-group"
                :list="this.doneCardsDrag"
                group="tasks"
                @start="startDrag"
                @end="endDrag"
            >

                <board-card
                    v-for="card in this.doneCardsDrag"
                    :key="card.id"
                    :id="card.id"
                    :name="card.name"
                    :description="card.description"
                    :deadline="card.deadline"
                    :assign_users="assign_users"

                />

            </draggable>
            <a href="/createCard/done" class="btn btn-outline-secondary add-card">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add card
            </a>
        </div>
    </div>

</template>

<script>
import draggable from 'vuedraggable'

export default {
    components: {
        draggable
    },
    name: "Board",
    props: {
        cards: "",
        project: "",
        assign_users: []
    },
    data() {
        return {
            backlogCardsDrag: this.cards.filter(card => card.category === "backlog"),
            todoCardsDrag: this.cards.filter(card => card.category === "toDo"),
            inProgressCardsDrag: this.cards.filter(card => card.category === "inProgress"),
            testingCardsDrag: this.cards.filter(card => card.category === "testing"),
            doneCardsDrag: this.cards.filter(card => card.category === "done"),
        }
    },
    computed: {
        computedProjects: function () {
            return this.project;
        },
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

    },
    methods: {
        startDrag(evt) {
            setTimeout(() => {
                evt.item.style.display = "none";
            }, 0)
            evt.item.style.transform = "rotate(11deg)";

        },
        endDrag(evt) {
            evt.item.style.display = "flex";
            evt.item.style.transform = "rotate(0deg)";

        },
        saveCards: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/saveCards',
                method: 'POST',
                data: {
                    'backlog': this.backlogCardsDrag,
                    'toDo': this.todoCardsDrag,
                    'inProgress': this.inProgressCardsDrag,
                    'testing': this.testingCardsDrag,
                    'done': this.doneCardsDrag
                },
            });
        }
    },
    beforeUpdate() {
        this.saveCards();
    }
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

    .board-title {
        margin-left: 7px;
    }

    .add-card {
        margin-top: 1.5em;
        border: none;
        width: 97%;
    }

</style>
