
<template>
    <div class="form-group row">
        <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>
        <div class="col-md-6">
            <select id="Category" type="text" class="form-control" name="category"  autocomplete="password">
                <option v-for="(category) in categories" :key="category.id" :value="category.id">
                    {{category.screen_name}}
                </option>
            </select>
        </div>
    </div>

</template>

<script>
import axios from 'axios';
import {GET_CATEGORIES} from '../endpoints/endpoints';
export default {
    props: {
        currentCategory: {
            type: Number, 
            required: true,
            default: 1
        }
    },
    data () {
        return {
            categories: [],
            current: {

            }
        };
    },
    methods: {
        getCategories(){
            axios.get(GET_CATEGORIES).then(({data: {data}}) => {
                this.categories = data;
            });
        },
        getCurrentCategory(){
            this.current = this.categories.filter(category => {
                // console.log(category);
                // TODO
                if(category.id === this.currentCategoryId){
                    return category;
                };
            });
        }
    },
    mounted () {
        this.getCategories();
        this.getCurrentCategory();

    },
    computed : {
        currentCategoryId: function () {
            return this.currentCategory;
        }
    } 
};
</script>