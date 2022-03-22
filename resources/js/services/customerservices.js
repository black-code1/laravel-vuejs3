import axios from "axios";
import { ref } from "vue";

export default function useCustomers() {
    const customers = ref([]);

    const getCustomers = async () => {
        let response = await axios.get("/api/customers");
        customers.value = response.data.data;
    };

    return {
        customers,
        getCustomers,
    };
}
