<script lang="ts" setup>
import { NButton, NSelect, NIcon, NH1, NPopover } from "naive-ui";
import { CloseOutline } from "@vicons/ionicons5";
import DataTable from "@/components/Table/DataTable.vue";
import { h, ref, reactive } from "vue";
import { queueTableColumns } from "../data/queueTable";
import { useQueueStore } from "@/app/logs/queueStore";
import { storeToRefs } from "pinia";
import { __ } from "@/plugins/i18n";

const store = useQueueStore();
const { getQueue, cancelQueue, cancelAll } = store;
const { queue, queueTotal, loading, error } = storeToRefs(store);

getQueue();

const columns = [
  ...queueTableColumns,
  {
    key: "actions",
    title: () => __("Actions", "shopmagic-for-woocommerce"),
    render: ({ id }) =>
      h(
        NPopover,
        {
          trigger: "hover",
        },
        {
          trigger: () =>
            h(
              NButton,
              {
                quaternary: true,
                type: "error",
                size: "small",
                onClick: () => cancelQueue(id),
              },
              { icon: () => h(NIcon, () => h(CloseOutline)) },
            ),
          default: () => __("Cancel", "shopmagic-for-woocommerce"),
        },
      ),
  },
];

const tableFilters = reactive<{ automation: number | null }>({
  automation: null,
});

function filterAutomations(automationId: number) {
  tableFilters.automation = automationId;
}

const bulkAction = ref<string | null>(null);
const checkedRows = ref([]);

function executeBulkAction() {
  if (bulkAction.value === "delete") {
    try {
      cancelAll(checkedRows.value);
    } catch (e) {
      console.error(e);
    } finally {
      checkedRows.value = [];
    }
  }
}
</script>
<template>
  <div class="flex gap-4">
    <NH1>{{ __("Queue", "shopmagic-for-woocommerce") }}</NH1>
  </div>
  <DataTable
    :columns="columns"
    :data="queue"
    :error="error"
    :filters="tableFilters"
    :loading="loading"
    :total-count="queueTotal || 0"
    v-model:checked-row-keys="checkedRows"
    @update:data="getQueue"
  >
    <template #bulkActions>
      <NSelect
        v-model:value="bulkAction"
        :options="[
          {
            label: __('Delete', 'shopmagic-for-woocommerce'),
            value: 'delete',
          },
        ]"
        class="w-[320px]"
      />
      <NButton @click="executeBulkAction">
        {{ __("Execute", "shopmagic-for-woocommerce") }}
      </NButton>
    </template>
  </DataTable>
</template>
