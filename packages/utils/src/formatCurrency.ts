export function formatCurrency(
  amount: number,
  currency: 'XOF' | 'EUR' | 'USD' = 'XOF',
  locale: string = 'fr-FR'
): string {
  return new Intl.NumberFormat(locale, {
    style: 'currency',
    currency,
    minimumFractionDigits: currency === 'XOF' ? 0 : 2,
  }).format(amount);
}

export function formatFCFA(amount: number): string {
  return formatCurrency(amount, 'XOF');
}
