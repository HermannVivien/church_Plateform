export function formatDate(input: string | Date, locale: string = 'fr-FR'): string {
  const date = typeof input === 'string' ? new Date(input) : input;
  return new Intl.DateTimeFormat(locale, {
    day: '2-digit',
    month: 'long',
    year: 'numeric',
  }).format(date);
}

export function formatDateTime(input: string | Date, locale: string = 'fr-FR'): string {
  const date = typeof input === 'string' ? new Date(input) : input;
  return new Intl.DateTimeFormat(locale, {
    day: '2-digit',
    month: 'short',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  }).format(date);
}
