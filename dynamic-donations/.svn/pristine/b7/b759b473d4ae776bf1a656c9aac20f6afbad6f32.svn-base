import dayjs from 'dayjs';

export const getFormattedDateRecurringDonation = (mode, interval, intervalCount = 1, startDate ='now') => {
  if (startDate =='now') {
    startDate= undefined;
  }
  if (mode === 'custom') {
    const date = dayjs(startDate).add(intervalCount, interval).format('dddd, MMMM D, YYYY');
    return `on ${date}`;
  } else if (mode === 'day') {
    const date = dayjs(startDate).add(1, 'day').format('MMM Do');
    return `tomorrow ${date}`;
  } else {
    const date = dayjs(startDate).add(1, mode).format('dddd, MMMM D, YYYY');
    return `on ${date}`;
  }
}
