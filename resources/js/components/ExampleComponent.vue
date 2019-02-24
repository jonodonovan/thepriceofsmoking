<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>The Price of Smoking</h1>
                <p>What does it cost you?</p>
            </div>
            <div class="col-md-8">
				 {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
		}
    }
</script>
