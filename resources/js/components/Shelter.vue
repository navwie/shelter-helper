<template>
    <div class="shelter-page">
        <h1 class="text-center">{{ shelterData.Name }}</h1>
        <p class="text-center">{{$t("shelter.p")}}</p>
        <div class="buttons">
            <a class="btn btn-primary" href="/createAnimal">{{$t("shelter.addAnimal")}}</a>
            <a class="btn btn-primary" href="/announcement">{{$t("shelter.announcement")}}</a>
        </div>
      <div class="card-ann">
          <animal-card
              v-for="animal in this.animalsData"
              :key="animal.index"
              :id="animal.id"
              :name="animal.Name"
              :age="animal.Age"
              :sex="animal.Sex"
              :img_url="animal.Img_URL"
              :type="animal.Type"
              :weight="animal.Weight"
          />
      </div>
    </div>
</template>

<script>
export default {
    name: "Shelter",
    props: {
        animals: [],
        shelter: ''
    },
    data() {
        return {
            animalsData: JSON.parse(this.animals),
            shelterData: JSON.parse(this.shelter),
            name: "",
            address: "",
            email: "",
            phone: "",
            formErrors: {
                name: "is-invalid",
                address: "is-invalid",
                email: "is-invalid",
                phone: "is-invalid",
            },
            active: true
        }
    },
    methods: {
        setLocale: function (locale) {
            localStorage.setItem('locale', locale);
            window.location.reload();
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    watch: {
        name() {
            this.formErrors.name = "is-valid";
            if (this.name.length < 3 || this.name.length > 32) {
                this.formErrors.name = "is-invalid";
            }
        },
        address() {
            this.formErrors.name = "is-valid";
            if (this.name.length < 3 || this.name.length > 32) {
                this.formErrors.name = "is-invalid";
            }
        },
        email() {
            this.formErrors.email = "is-valid";
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) {
                this.formErrors.email = "is-invalid";
            }
        },
        phone(){
            this.formErrors.phone = "is-valid";
            if (!(/[+][0-9]{4,}/.test(this.phone))) {
                this.formErrors.phone = "is-invalid";
            }
        },
    },
}
</script>

<style scoped>
    .shelter-page h1{
        margin-top: 50px;
        font-size: 30px;
        font-family: 'Montserrat', sans-serif;
    }
    .shelter-page p{
        margin-top: 20px;
        font-size: 28px;
        font-family: 'Montserrat', sans-serif;
    }
    .buttons a{
        text-decoration: none;
        width: 220px;
        font-size: 22px;
        margin-left: 15px;
        font-family: 'Montserrat', sans-serif;
        border-radius: 15px;
    }
    .buttons{
        margin-left: 680px;
    }
    .card-ann{
        display: flex;
        flex-wrap:wrap;
    }
</style>
