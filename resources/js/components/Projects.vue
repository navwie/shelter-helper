<template>
    <div class="d-flex flex-column align-items-center">
        <form class="col-4 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-4">
            <div class="d-flex flex-row">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <div class="col-8 mt-5">
            <h5 class="projects-header">Projects 2</h5>
        </div>
        <div class="col-8 mt-3 project">
            <h5 class="project-title">Project №1</h5>
            <h6 class="project-description">Example of user project that can be displayed here</h6>
        </div>
        <div class="col-8 mt-3 project">
            <h5 class="project-title">Project №2</h5>
            <h6 class="project-description">Example of user project that can be displayed here</h6>
        </div>
        <div>
            <button class="btn btn-outline-dark">
                Create project
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Projects"
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

    .projects-header {
        margin-left: 15px;
    }

    .project-description {
        margin-top: 15px;
    }

    .project-title {
        margin-top: 10px;
    }

    .btn-outline-dark {
        position: fixed;
        bottom: 15%;
        right: 20%;
        height: 3em;
        border-radius: 25px;
        font-weight: 500;
    }
</style>
