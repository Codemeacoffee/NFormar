<template>
    <form id="tpvForm" method="post" v-bind:action="url">
        <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1">
        <input type="hidden" name="Ds_MerchantParameters" v-bind:value="parameters">
        <input type="hidden" name="Ds_Signature" v-bind:value="signature">
    </form>
</template>

<script>
export default {
    name: "TpvRedirect",
    props: {
        url: String,
        parameters: String,
        signature: String
    },
    mounted() {
        $('#tpvForm').submit();
    }
}
</script>
