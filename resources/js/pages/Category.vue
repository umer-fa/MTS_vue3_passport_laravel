<template>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{this.$route.name}}</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive" style="min-width: 845px">
                    <thead>
                    <tr>
                        <th width="10px">Sr</th>
                        <th>Name</th>
                        <th>Parent Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(category, index) in categories">
                        <td>{{++index}}</td>
                        <td>{{category.cat_name}}</td>
                        <td>{{category.parent_id? parents[category.parent_id]:'.....'}}</td>
                        <td><img v-bind:src="category.image" class="redius" width="50" height="50" v-bind:alt="category.cat_name" /></td>
                        <td>
                            <router-link v-bind:to="'/updatecategory?id=' + category.id" class="btn btn-xs btn-primary" title="Update"><i class="fas fa-pen"></i></router-link>   <label>&nbsp;</label>
                            <button type="button" class="btn btn-xs btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Category",
    data() {
        return {
            categories:[],
            parents:[],
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    beforeMount(){
        axios.post('api/category').then(response => {
            this.categories = response.data.message;
            this.parents = response.data.parents
        });
    },
}
</script>
<style>
    img.redius {
        max-width: 100%;
        max-height: 500px;
        border-radius: 100%;
    }
</style>
