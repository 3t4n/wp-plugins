<script lang="ts" setup>
import { NButton, NP, NTooltip, NCheckbox, NInput, NSelect, useMessage } from "naive-ui";
import { InformationCircleOutline } from "@vicons/ionicons5";
import {
  isScoped,
  type Layout,
  mapDispatchToControlProps,
  mapStateToLayoutProps,
  resolveSchema,
} from "@jsonforms/core";
import { type LayoutProps, rendererProps, useControl } from "@jsonforms/vue";
import { useVanillaLayout } from "../util";
import FieldWrapper from "./FieldWrapper.vue";
import { type Ref, computed, ref, unref, watch, onMounted } from "vue";
import { __, sprintf } from "@/plugins/i18n";
import { get, useMessageOptions } from "@/_utils";
import { useDebounceFn } from "@vueuse/core";

const useJsonFormsLayout = (props: LayoutProps) => {
  const { control, ...other } = useControl(props, mapStateToLayoutProps, mapDispatchToControlProps);
  return { layout: control, ...other };
};

const props = defineProps(rendererProps<Layout>());
const { handleChange, layout } = useVanillaLayout(useJsonFormsLayout(props));

const spreadsheetRef = ref<string | null>(layout.value.data["spreadsheet"] || null);
const spreadsheetTitleRef = ref<string | null>();
const spreadsheetErrorRef = ref<string | null>();
const spreadsheetTitle = computed(() =>
  spreadsheetTitleRef.value
    ? sprintf(__("Spreadsheet: %s", "shopmagic-for-woocommerce"), spreadsheetTitleRef.value)
    : "",
);
const worksheetRef = ref<string | null>(layout.value.data["spreadsheet_tab"] || null);
const worksheetsRef = ref<string[]>([]);
const rowsHeader = ref<string[]>([]);
const useHeader = ref<boolean>(layout.value.data["use_header"] || false);
const rowsRef = ref<string[]>(layout.value.data["values"] || []);

const message = useMessage();

populateHeaderRows(useHeader.value);

const groupSchema = computed(() => {
  if (!isScoped(layout.value.uischema)) return;
  return resolveSchema(layout.value.schema, layout.value.uischema.scope, layout.value.schema);
});

const loadingRef = ref(false);
const getWorksheets = useDebounceFn(
  (spreadsheet) => {
    loadingRef.value = true;
    doGetWorksheets(spreadsheet).finally(() => (loadingRef.value = false));
  },
  600,
  { maxWait: 5000 },
);

async function doGetWorksheets(spreadsheet: string | Ref<string> | null) {
  spreadsheet = unref(spreadsheet);

  if (spreadsheet === null || spreadsheet === "") {
    worksheetsRef.value = [];
    spreadsheetTitleRef.value = null;
    return;
  }

  spreadsheetErrorRef.value = null;
  try {
    const data = await get<string[]>(`/extensions/sheets/${spreadsheet}/worksheets`);

    if (Array.isArray(data)) {
      // v1 of response format
      worksheetsRef.value = data.map((item) => ({
        label: item,
        value: item,
      }));
    } else {
      worksheetsRef.value = data.worksheets.map((item) => ({
        label: item,
        value: item,
      }));
      spreadsheetTitleRef.value = data.title;
    }

    if (worksheetsRef.value.length === 1) {
      worksheetRef.value = worksheetsRef.value[0].value;
    } else if (worksheetsRef.value.find(({ value }) => value === worksheetRef.value)) {
      // Previously selected value is present in current set.
      return;
    } else {
      worksheetRef.value = null;
    }
  } catch (e) {
    spreadsheetErrorRef.value = e?.cause || e.message;

    worksheetsRef.value = [];
    spreadsheetTitleRef.value = null;
    return;
  }
}

async function populateHeaderRows(useRealLabels: boolean) {
  if (useRealLabels && (worksheetRef.value === null || spreadsheetRef.value === null)) {
    message.warning(
      __("Please select a spreadsheet and a worksheet first", "shopmagic-for-woocommerce"),
      useMessageOptions
    );
    return;
  }

  useHeader.value = useRealLabels;
  rowsHeader.value = [];

  if (useRealLabels) {
    rowsHeader.value = await get<string[]>(
      `/extensions/sheets/${spreadsheetRef.value}/worksheets/${worksheetRef.value}`,
    );
  } else {
    rowsRef.value.length === 0 ? addRow() : rowsRef.value.forEach(addRow);
  }
}

function addRow() {
  const A_CHAR_CODE = 65;
  rowsHeader.value = rowsHeader.value || [];
  const nextCharCode =
    rowsHeader.value.length > 0
      ? (rowsHeader.value.at(-1) as string).charCodeAt(0) + 1
      : A_CHAR_CODE;
  const nextLabel = String.fromCharCode(nextCharCode);

  rowsHeader.value.push(nextLabel);
}

function updateDynamicRows(rowIndex: number, value: string) {
  rowsRef.value[rowIndex] = value;
}

watch(spreadsheetRef, (spreadsheet) => {
  handleChange("spreadsheet", spreadsheet);
  worksheetRef.value = null;
});

watch(worksheetRef, (worksheet) => {
  handleChange("spreadsheet_tab", worksheet);
});

watch(useHeader, (newHeader, oldHeader) => {
  if (newHeader !== oldHeader) {
    handleChange("use_header", newHeader);
  }
});

watch(
  rowsRef,
  (rows) => {
    handleChange("values", rows);
  },
  { deep: true },
);

onMounted(() => {
  if (spreadsheetRef.value) {
    getWorksheets(spreadsheetRef.value);
  }
});

const documentation = sprintf(
  __('Enter the Spreadsheet ID according to our %1$s.', 'shopmagic-for-woocommerce'),
  `<a class="text-blue-300 hover:text-blue-400" href="https://docs.shopmagic.app/article/1118-how-to-use-shopmagic-with-google-sheets" target="_blank">${__('documentation', 'shopmagic-for-woocommerce')}</a>`,
);
</script>
<template>
  <FieldWrapper
    :description="spreadsheetTitle"
    :errors="spreadsheetErrorRef || ''"
    :label="groupSchema.properties['spreadsheet'].title"
  >
    <div class="flex flex-auto gap-x-4">
    <NInput :loading="loadingRef" :placeholder="__('Paste Spreadsheet ID', 'shopmagic-for-woocommerce')" v-model:value="spreadsheetRef" @update:value="getWorksheets"/>
    <NTooltip :width="250" trigger="click">
      <template #trigger>
        <NButton text>
          <template #icon> <InformationCircleOutline /> </template>
        </NButton>
      </template>
      <NP class="text-white" v-html="documentation"></NP>
    </NTooltip>
    </div>
  </FieldWrapper>
  <FieldWrapper :label="groupSchema.properties['spreadsheet_tab'].title">
    <NSelect
      v-model:value="worksheetRef"
      :options="worksheetsRef"
      @update:show="
        (show: boolean) => show && worksheetsRef.length === 0 && getWorksheets(spreadsheetRef)
      "
      filterable
    />
  </FieldWrapper>
  <FieldWrapper :show-label="false">
    <NCheckbox
      v-model:checked="useHeader"
      :label="groupSchema.properties['use_header'].title"
      @update:checked="populateHeaderRows"
    />
  </FieldWrapper>
  <div class="flex flex-col gap-y-4">
    <FieldWrapper v-for="(row, i) in rowsHeader" :key="i" :label="row">
      <NInput :default-value="rowsRef[i]" @update:value="(v) => updateDynamicRows(i, v)" />
    </FieldWrapper>
    <NButton v-if="!useHeader" @click="addRow">
      {{ __("Add Row", "shopmagic-for-woocommerce") }}
    </NButton>
  </div>
</template>
