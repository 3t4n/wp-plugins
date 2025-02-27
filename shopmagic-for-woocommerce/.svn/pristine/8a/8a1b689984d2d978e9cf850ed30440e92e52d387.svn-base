import { defineStore } from "pinia";
import useSWRV from "@/_utils/swrv";
import type { Query } from "@/_utils";
import { ref } from "vue";
import { appendSearchParams } from "@/composables/useSearchParams";

export const useTrackerStore = defineStore("tracker", () => {
  const perAutomation = ref([]);
  const automationsUrl = ref("/automations/stats");
  const clientsUrl = ref("/clients/stats");

  const { data: automations } = useSWRV(automationsUrl);
  const { data: customers } = useSWRV(clientsUrl);

  function fetchAutomations(query?: Query) {
    if (query) {
      automationsUrl.value = appendSearchParams("/automations/stats/", query);
    } else {
      automationsUrl.value = "/automations/stats/";
    }
  }

  function fetchCustomers(query?: Query) {
    if (query) {
      clientsUrl.value = appendSearchParams("/clients/stats/", query);
    } else {
      clientsUrl.value = "/clients/stats/";
    }
  }

  return {
    automations,
    customers,
    perAutomation,
    fetchAutomations,
    fetchCustomers,
  };
});
