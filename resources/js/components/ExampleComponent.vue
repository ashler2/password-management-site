<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log(testData?.testField);
            console.log(testData2?.testField2);
        },
        data(){
            return {
                testData: {
                    testField: 'string',
                },
                testData2: null
            };
        }
    };
</script>
