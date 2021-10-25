<template>
    <div>
        <transition name="slide-fade">
            <div v-if="show" @click="this.click" class="content">
                <div class="text">
                    <span>You have created a new document:  <em><strong>{{ this.data.document.name }}</strong></em></span>
                    <V-MaterialIcon icon="check_circle" color="white"></V-MaterialIcon>
                </div>
            </div>
        </transition>
        <input type="hidden" name="_token" :value="this.csrfToken">
    </div>
</template>

<script>
export default {
    name: "CreateDocumentNotification",
    props: {
        id: "",
        data: [],
    },
    data() {
        return {
            show: true,
        }
    },
    methods: {
        read: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/readNotification',
                method: 'POST',
                data: {
                    'id': this.id
                }
            });
        },
        click: function () {
            this.show = !this.show;
            this.read();
        }

    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
    }
}
</script>

<style scoped>

    .content {
        padding: 16px;
        border-radius: 7px;
        color: #ffffff;
        background-color: #2d995b;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
        margin-top: 30px;
    }

    span {
        margin-right: 15px;
    }

    .text {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    {
        transform: translateX(10px);
        opacity: 0;
    }
</style>
