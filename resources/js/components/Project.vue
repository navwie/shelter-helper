<template>
    <div class="d-flex flex-row col-8 mt-3 project justify-content-between">
        <div>
            <h5 class="project-title">{{ name }}</h5>
            <h6 class="project-description">{{ description }}</h6>
        </div>
        <div>
            <a :href=addId class="btn btn-outline-danger">Remove</a>
        </div>

    </div>
</template>

<script>
export default {
    name: "Project",
    data() {
        return {
            deleteUrl: "/deleteProjectService/"
        }
    },
    props: {
        id: "",
        name: "",
        description: ""
    },
    computed: {
        addId: function () {
            return this.deleteUrl + this.id;
        }
    }
}
</script>

<style scoped>
    .project {
        height: 7em;
        padding: 6px 6px 6px 15px;
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #74787e;
    }

    .project-description {
        margin-top: 15px;
    }

    .project-title {
        margin-top: 10px;
    }
</style>
