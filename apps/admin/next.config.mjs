/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  transpilePackages: ['@church/ui', '@church/types', '@church/utils'],
};

export default nextConfig;
