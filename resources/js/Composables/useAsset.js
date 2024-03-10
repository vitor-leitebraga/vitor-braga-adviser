import Vapor from "laravel-vapor"

export function useAsset(asset) {
	return Vapor.asset(asset)
}
